<template>
<div class="container">
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form v-on:submit.prevent="onSubmit">
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Name..." v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Username..." v-model="username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Password" v-model="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" v-model="c_password">
                    </div>
                    <button class="btn btn-success float-right">Register</button>
                    <router-link to="/login" class="btn btn-primary mr-2 float-right">Login</router-link>
                </form>
            </div>
        </div>
    </div>    
</div>  
</template>

<script>
export default {
    name: 'register',
    props: ['app'],
    data() {
        return {
            name: '',
            username: '',
            password: '',
            c_password: '',
            errors: []
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];
            if(!this.name) {
                this.errors.push('Name is required');
            }
            if(!this.username) {
                this.errors.push('Userame is required');
            }
            if(!this.password) {
                this.errors.push('Password is required');
            }
            if(!this.c_password) {
                this.errors.push('Confirm Password is required');
            }
            if(this.password !== this.c_password) {
                this.errors.push('Password do not match');
            }
            if(!this.errors.length) {
                const data = {
                    name: this.name,
                    username: this.username,
                    password: this.password
                }
                this.app.req.post('auth/register', data).then(response => {
                    this.app.user = response.data;
                    this.$router.push("/");
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }
        }
    }
}
</script>

<style>

</style>