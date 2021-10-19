<template>
    <div id="conteiner">

        <singUp/>
        <!-- <auth-view/> -->
        <!-- <EditUser/> -->
        <!-- <form-add-task/> -->
        <!-- <edit-task/> -->
        <!-- <delete-task/> -->

        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import AuthView from './AuthView.vue'
import SingUp from './SingUp.vue'
import EditUser from './EditUser.vue'

// imports components CRUd relacioships tasks
import FormAddTask from './FormAddTask.vue'
import EditTask from './EditTask.vue'
import DeleteTask from './DeleteTask.vue'
export default {
  components: { AuthView, SingUp, EditUser, FormAddTask, EditTask, DeleteTask },
  }
</script>
