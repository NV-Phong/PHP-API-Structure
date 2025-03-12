<?php

class Router
{
	private $routes = [];

	public function get($path, $callback)
	{
		$this->routes['GET'][$path] = $callback;
	}

	public function post($path, $callback)
	{
		$this->routes['POST'][$path] = $callback;
	}

	public function put($path, $callback)
	{
		$this->routes['PUT'][$path] = $callback;
	}

	public function delete($path, $callback)
	{
		$this->routes['DELETE'][$path] = $callback;
	}

	public function dispatch()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		foreach ($this->routes[$method] ?? [] as $path => $callback) {
			$pattern = str_replace('/', '\/', $path);
			$pattern = "@^" . $pattern . "$@";
			if (preg_match($pattern, $uri, $matches)) {
				array_shift($matches);
				call_user_func_array($callback, $matches);
				return;
			}
		}

		header('HTTP/1.1 404 Not Found');
		echo json_encode(['error' => 'Route not found']);
	}
}
