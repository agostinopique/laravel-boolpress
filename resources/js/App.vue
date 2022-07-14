<template>
    <div>
        <HeaderComp />
        <main class="pt-4 text-light">
            <div class="container">
                <!-- <h1 class="mb-5">My first laravel & vueJS</h1>
                <div
                v-for="post in posts"
                :key="post.id"
                class="my-3">
                    <h3>{{ post.title }}</h3>
                    <p>{{ post.content }}</p>
                </div> -->
                <router-view></router-view>
            </div>
        </main>
        <FooterComp />
    </div>
</template>

<script>
import HeaderComp from './components/partials/HeaderComp.vue';
import FooterComp from './components/partials/FooterComp.vue';

export default {
    name: 'app',
    components:{
        HeaderComp,
        FooterComp
    },

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
main{
    min-height: calc(100vh - 120px);
    background-color: #444554;
}
</style>
