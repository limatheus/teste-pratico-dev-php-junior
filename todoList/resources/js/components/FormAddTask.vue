<template>
<div>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>
            </div>
        </div>
  </header>

    <main class="form-signin"> 
        <form @submit.stop.prevent="submit">
            <h1 class="h3 mb-3 fw-normal">Create task</h1>

            <div class="form-floating">
                <input v-model="user_id" type="number" class="form-control" id="floatingInput" placeholder="insert You ID">

                <input v-model="task" type="text" class="form-control" id="floatingInput" placeholder="insert you task">
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Create task</button>
        </form>
    </main>
</div>
</template>

<script>
export default {
    data(){
        return {    
            user_id:Number(''),
            task:'',
        }
    },

    methods:{
        submit(){
            const payload = {
                'user_id': {"user_id": this.user_id},
                'task': {"task": this.task },
            }
            fetch('http://127.0.0.1:8000/api/task/store', {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                },
                body: JSON.stringify(payload)
            }).then(response => response.json() )
              .then( res => {
                  alert("task created")
                  console.log(res);
              });
        }
    }
};
</script>

<style scoped>
/* css form login */
    html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

/* css header */
.b-example-divider {
  height: 3rem;
  background-color: rgba(0, 0, 0, .1);
  border: solid rgba(0, 0, 0, .15);
  border-width: 1px 0;
  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.form-control-dark {
  color: #fff;
  background-color: var(--bs-dark);
  border-color: var(--bs-gray);
}
.form-control-dark:focus {
  color: #fff;
  background-color: var(--bs-dark);
  border-color: #fff;
  box-shadow: 0 0 0 .25rem rgba(255, 255, 255, .25);
}

.bi {
  vertical-align: -.125em;
  fill: currentColor;
}

.text-small {
  font-size: 85%;
}

.dropdown-toggle {
  outline: 0;
}

</style>