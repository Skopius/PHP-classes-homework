<?php

class Task {
    protected $createdAt;
    protected $name;
    protected $descritpion;
    protected $statuses = ['Сделать', 'В работе', 'Сделано', 'Завершено'];
    protected $status;
    protected $deadline;

    public function validateDate($date, $format = 'Y.m.d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public function __construct($name, $descritpion, $statusId, $deadline) {

        if (!$this->validateDate($deadline)) {
            throw new InvalidArgumentException("Дата должна быть формата ГГГГ.ММ.ДД!");
        }

        if(!isset($this->statuses[$statusId])) {            
            throw new InvalidArgumentException("Такого статуса не существует!");
        }

        $this->createdAt = date('Y.m.d');
        $this->name = $name;
        $this->descritpion = $descritpion;
        $this->status = $this->statuses[$statusId];
        $this->deadline = $deadline;
    }
    public function setTaskName($name) {
        $this->name = $name;
    }

    public function setTaskDescription($descritpion) {
        $this->descritpion = $descritpion;
    }

    public function setTaskStatus($statusId) {
        $this->status = $this->statuses[$statusId];
    }

    public function setTaskDeadline($deadline) {
        $this->deadline = $deadline;
    }

    public function getTaskName() {
        return 'Задача - ' . $this->name;
    }

    public function getTaskDescription() {
        return $this->descritpion;
    }

    public function getTaskStatus() {
        return 'Статус - ' . $this->status;
    }

    public function getTaskDeadline() {
        return' Крайний срок - ' . $this->deadline;
    }

    public function getTaskInfo() {
        return  $this->getTaskName() . ' ' . $this->getTaskStatus() . ' ' . $this->getTaskDeadline();
    }
}



class TaskList {
    protected $tasks = [];
    protected $taskCount = 0;

    protected function countTasks() {
        $this->taskCount = count($this->tasks);
    }

    public function createTask($name, $descritpion, $statusId, $deadline) {
        $this->tasks[] = new Task($name, $descritpion, $statusId, $deadline);
        $this->countTasks();
    }

    public function removeTask($taskId) {
        if(isset($this->tasks[$taskId])) {
            unset($this->tasks[$taskId]);
            $this->countTasks();
        } else {
            throw new InvalidArgumentException("Задачи с таким индексом не существует!");
        }
        
    }

    public function showTaskList() {
        echo 'Количество задач - ' . $this->taskCount . '</br>';
        foreach($this->tasks as $task) {
            echo $task->getTaskInfo() . '</br>';
        }
    }
    public function showTask($taskId) {
        echo $this->tasks[$taskId]->getTaskInfo() . '</br>';
    }
}

$taskList = new TaskList;

$taskList->createTask('Задача 1', 'Описание задачи', 0, '2024.04.24');
$taskList->createTask('Задача 2', 'Описание задачи', 0, '2024.04.24');
$taskList->createTask('Задача 3', 'Описание задачи', 3, '2024.04.24');

// $taskList->showTaskList();

$taskList->removeTask(1);

// $taskList->showTaskList();


$taskList->showTask(2);