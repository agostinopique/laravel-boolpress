<template>
    <div class="container">
        <h1>Our blogs latest posts</h1>
        <PostComp
         v-for="post in posts"
        :key="post.id"
        :post='post' />

    </div>
</template>

<script>
import PostComp from './PostComp.vue';
export default {
    name: 'BlogComp',
    components:{
        PostComp
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

<style lang="scss" scoped|>

</style>
