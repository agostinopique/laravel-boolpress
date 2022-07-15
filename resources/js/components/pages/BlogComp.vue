<template>
    <div class="container">
        <h1>Our latest blog posts</h1>
        <LoaderComp
            v-if="!posts"
        />
        <div v-else>

            <div>

                <PostComp
                 v-for="post in posts"
                :key="post.id"
                :post='post' />

            </div>

            <div class="mt-4 pb-4">
                <button class="btn btn-primary"
                :disabled="currentPage === 1"
                @click="getApi(currentPage + 1)">&lt;&lt;</button>

                <button
                class="btn btn-primary mx-1"
                v-for="i in lastPage"
                :key="i"
                :disabled="currentPage === i"
                @click="getApi(i)">{{ i }}</button>

                <button class="btn btn-primary"
                @click="getApi(currentPage + 1)"
                :disabled="currentPage === lastPage">&gt;&gt;</button>
            </div>
        </div>
    </div>
</template>

<script>
import PostComp from './PostComp.vue';
import LoaderComp from './LoaderComp.vue';

export default {
    name: 'BlogComp',
    components:{
        PostComp,
        LoaderComp
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
        this.posts = null;
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
