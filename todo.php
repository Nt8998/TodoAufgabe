<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $username = $_SESSION['username'];

    function getTodo()
    {
        $todos = [];
        if (file_exists('todo.json')) {
            $text = file_get_contents(__DIR__ . '/todo.json');
            $todos = json_decode($text, true);
        }
        return $todos;
    }

    function getTodoById($id)
    {
        $todos = getTodo();
        foreach ($todos as $todo) {
            if ($todo['id'] == $id) {
                return $todo;
            }
        }
        return null;
    }

    function createTodo($data)
    {
        global $username;
        $todos = getTodo();

        $data['id'] = rand(100000, 20000000);
        $data['user'] = $username;

        $todos[] = $data;

        helpPutJson($todos);

        return $data;
    }

    function updateTodo($data, $id)
    {
        global $username;
        $todos = getTodo();
        foreach ($todos as $i => $todo) {
            if ($todo['id'] == $id) {
                $data['user'] = $username;
                $todos[$i] = array_merge($todo, $data);
            }
        }
        helpPutJson($todos);
    }

    function deleteTodo($id)
    {
        $todos = getTodo();
        foreach ($todos as $i => $todo) {
            if ($todo['id'] == $id) {
                unset($todos[$i]);
            }
        }
        helpPutJson($todos);
    }

    function helpPutJson($todos)
    {
        file_put_contents(__DIR__ . '/todo.json', json_encode($todos, JSON_PRETTY_PRINT));
    }
} else {
    header("Location: index.php");
}
?>
