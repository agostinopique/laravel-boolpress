<template>
    <div class="container">
        <div>

            <h1>Our blogs latest posts</h1>
            <PostComp
             v-for="post in posts"
            :key="post.id"
            :post='post' />

        </div>

        <div class="mt-4 pb-4">
            <button class="btn btn-primary"
            :disabled="currentPage === 1"
            @click="getApi(currentPage + 1)">&lt;&lt;&lt;</button>

            <button
            class="btn btn-primary mx-1"
            v-for="i in lastPage"
            :key="i"
            :disabled="currentPage === i"
            @click="getApi(i)">{{ i }}</button>

            <button class="btn btn-primary"
            @click="getApi(currentPage + 1)"
            :disabled="currentPage === lastPage">&gt;&gt;&gt;</button>
        </div>
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
            posts: null,
            currentPage: null,
            lastPage: null
        }
    },
    methods:{

        getApi(page){
            axios.get(this.apiUrl + '?page=' + page)
            .then(res => {
                console.log(res.data.posts);
                this.currentPage = res.data.posts.current_page;
                this.posts = res.data.posts.data;
                this.lastPage = res.data.posts.last_page;

            })
        }

    },

    mounted(){
        this.getApi(1)
    }
}
</script>

<style lang="scss" scoped|>

</style>
