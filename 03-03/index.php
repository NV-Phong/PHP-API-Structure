<?php
// Configuration
$uploadDir = 'uploads/';
$maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

// Create uploads directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file upload
$messages = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
    $files = $_FILES['files'];
    $uploadCount = count($files['name']);
    
    for ($i = 0; $i < $uploadCount; $i++) {
        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $fileTmpPath = $files['tmp_name'][$i];
            $fileName = $files['name'][$i];
            $fileSize = $files['size'][$i];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
            if (!in_array($fileExt, $allowedTypes)) {
                $messages[] = ['type' => 'error', 'text' => "Invalid file type for $fileName. Only JPG, PNG, GIF, and PDF allowed."];
                continue;
            }
            
            if ($fileSize > $maxFileSize) {
                $messages[] = ['type' => 'error', 'text' => "File $fileName exceeds 5MB limit."];
                continue;
            }
            
            $uniqueName = md5(time() . $fileName) . '.' . $fileExt;
            $destination = $uploadDir . $uniqueName;
            
            if (move_uploaded_file($fileTmpPath, $destination)) {
                $messages[] = ['type' => 'success', 'text' => "Successfully uploaded: $fileName as $uniqueName"];
            } else {
                $messages[] = ['type' => 'error', 'text' => "Error uploading: $fileName"];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload System</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background: #f9fafb;
            color: #1f2937;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #111827;
        }

        .form-container {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .file-input {
            display: block;
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .upload-btn {
            background: #4f46e5;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .upload-btn:hover {
            background: #4338ca;
        }

        .messages {
            margin: 1rem 0;
        }

        .message-success {
            background: #dcfce7;
            color: #166534;
            padding: 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
        }

        .message-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
        }

        .preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .preview-card {
            background: #f3f4f6;
            border-radius: 0.375rem;
            padding: 0.5rem;
            text-align: center;
        }

        .preview-card img {
            width: 100%;
            height: auto;
            border-radius: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .preview-card p {
            font-size: 0.75rem;
            color: #6b7280;
            word-break: break-all;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1rem;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .card iframe {
            width: 100%;
            height: 200px;
            border: none;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .card .file-name {
            color: #1f2937;
            font-size: 0.875rem;
            word-break: break-all;
            margin-bottom: 0.5rem;
        }

        .card a {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Upload Files</h2>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" multiple accept=".jpg,.jpeg,.png,.gif,.pdf" class="file-input" id="fileInput">
            <div id="preview" class="preview-container"></div>
            <button type="submit" class="upload-btn">Upload Files</button>
        </form>
        <?php if (!empty($messages)): ?>
            <div class="messages">
                <?php foreach ($messages as $message): ?>
                    <div class="message-<?= $message['type'] ?>">
                        <?= htmlspecialchars($message['text']) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <h2>Uploaded Files</h2>
    <div class="gallery">
        <?php
        if (is_dir($uploadDir)) {
            $files = scandir($uploadDir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $filePath = $uploadDir . $file;
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    echo '<div class="card">';
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo '<img src="' . htmlspecialchars($filePath) . '" alt="' . htmlspecialchars($file) . '">';
                    } elseif ($ext === 'pdf') {
                        // Use a viewer URL to prevent loop
                        echo '<iframe src="' . htmlspecialchars($filePath) . '#view=FitH" title="' . htmlspecialchars($file) . '"></iframe>';
                    }
                    echo '<p class="file-name">' . htmlspecialchars($file) . '</p>';
                    echo '<a href="' . htmlspecialchars($filePath) . '" download>Download</a>';
                    echo '</div>';
                }
            }
        }
        ?>
    </div>

    <script>
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('preview');

        fileInput.addEventListener('change', function() {
            previewContainer.innerHTML = '';
            const files = this.files;

            for (const file of files) {
                const fileExt = file.name.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExt)) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const card = document.createElement('div');
                        card.className = 'preview-card';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        
                        const name = document.createElement('p');
                        name.textContent = file.name;
                        
                        card.appendChild(img);
                        card.appendChild(name);
                        previewContainer.appendChild(card);
                    };
                    reader.readAsDataURL(file);
                } else {
                    const card = document.createElement('div');
                    card.className = 'preview-card';
                    
                    const label = document.createElement('p');
                    label.textContent = 'PDF Preview Not Available';
                    
                    const name = document.createElement('p');
                    name.textContent = file.name;
                    
                    card.appendChild(label);
                    card.appendChild(name);
                    previewContainer.appendChild(card);
                }
            }
        });
    </script>
</body>
</html>