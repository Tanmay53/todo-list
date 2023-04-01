<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * Create Task
     *
     * @param string $name
     * @param string $description
     * @param string $status
     * @param string $priority
     * @param string $dueDate
     * @param int $remindBefore
     *
     * @return Task
     */
    public static function cretaeTask(
        string $name,
        string $description = null,
        string $status,
        string $priority = null,
        string $dueDate = null,
        int $remindBefore = 0
    ) {
        $task = new Task;

        $task->user_id = Auth::user()->id;
        $task->name = $name;
        $task->description = $description;
        $task->status = $status;
        $task->priority = ($priority != 'na') ? $priority : null;
        $task->due_date = (strlen($dueDate) > 0) ? date("Y-m-d", strtotime($dueDate)) : null;
        $task->remind_before = ((strlen($dueDate) > 0) && ($remindBefore > 0)) ? $remindBefore : null;

        return $task->save();
    }


    /**
     * Update Task
     *
     * @param string $name
     * @param string $description
     * @param string $status
     * @param string $priority
     * @param string $dueDate
     * @param int $remindBefore
     *
     * @return Task
     */
    public function updateTask(
        string $name,
        string $description = null,
        string $status,
        string $priority = null,
        string $dueDate = null,
        int $remindBefore = 0
    ){
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
        $this->priority = ($priority != 'na') ? $priority : null;
        $this->due_date = (strlen($dueDate) > 0) ? date("Y-m-d", strtotime($dueDate)) : null;
        $this->remind_before = ((strlen($dueDate) > 0) && ($remindBefore > 0)) ? $remindBefore : null;

        return $this->save();
    }
}
