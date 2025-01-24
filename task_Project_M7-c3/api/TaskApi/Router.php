<?php

namespace Api\TaskApi;

class Router {
    private $task;

    public function __construct($task) {
        $this->task = $task;
    }

    //Checking Request type

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = isset($_GET['id']) ? intval($_GET['id']) : null;

        switch ($method) {
        case "GET":
            $this->handleGetRequest($path);
            break;
        case "POST":
            $this->handlePostRequest();
            break;
        case "PUT":
            $this->handlePutRequest($path);
            break;
        case "DELETE":
            $this->handleDeleteRequest($path);
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Method Not Allowed"]);
        }
    }

    //Handel Get Request

    private function handleGetRequest($id) {
        if ($id) {
            //Get a single task by id
            $task = $this->task->getTask($id);
            if ($task) {
                echo json_encode($task);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Task not found"]);
            }
        } else {
            //Fetch All Task
            $tasks = $this->task->getAllTasks();
            if (empty($tasks)) {
                http_response_code(404);
                echo json_encode(["error" => "No tasks found"]);
            } else {
                echo json_encode($tasks);
            }
        }
    }

    //Handle Post request

    private function handlePostRequest() {
        $data = json_decode(file_get_contents("php:/input"), true);

        //validate Title
        if (!isset($data['title']) || trim($data['title']) === "") {
            http_response_code(400);
            echo json_encode(["error" => "Title is required"]);
            return;
        }

        //priority Validation
        $validPriorities = ["low", "medium", "high"];
        if (isset($data['priority']) && !in_array($data['priority'], $validPriorities)) {
            http_response_code(404);
            echo json_encode(["error" => "Invalid priority. valid priorities: low, medium, high."]);
            return;
        }

        // create task
        $response = $this->task->createTask($data);
        echo json_encode($response);
    }

    //Handle Put request

    private function handlePutRequest($id) {
        if (!$id) {
            echo json_encode(["error" => "Task Id is required"]);
            http_response_code(400);
            return;
        }
        $data = json_decode(file_get_contents("php/input"), true);
        echo json_encode($this->task->updateTask($id, $data));
    }

    //Handle Delete request

    private function handleDeleteRequest($id) {
        if (!$id) {
            echo json_encode(["error" => "Task Id is required"]);
            http_response_code(400);
            return;
        }
        echo json_encode($this->task->deleteTask($id));
    }
}