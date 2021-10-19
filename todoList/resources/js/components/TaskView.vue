<template>
        <div class="Todoconteiner">
        <div class="heading">
            <div id="title"> Todo LIst</div>
            <form-add-task/>
            <list-task/>
        </div>
    </div>
</template>

<script>
import formAddTask from './FormAddTask.vue';
import listTask from './ListTask.vue';
export default {
    components:{
        formAddTask,
        listTask
    }
}
</script>
