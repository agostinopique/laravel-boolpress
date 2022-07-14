<template>
<div class="container mt-4 text-light">
    <h1 class="mb-5">My first laravel & vueJS</h1>
    <div
    v-for="post in posts"
    :key="post.id"
     class="my-3">
        <h3>{{ post.title }}</h3>
        <p>{{ post.content }}</p>
    </div>
</div>
</template>

<script>
export default {
    name: 'app',

    data(){

        return{
            apiUrl: '/api/posts',
            posts: null
        }
    },
    methods:{

        getApi(){
            axios.get(this.apiUrl)
            .then(res => {

                this.posts = res.data.posts;

            })
        }

    },

    mounted(){
        this.getApi()
    }
}
</script>

<style>

</style>
