<template>
    <div class="container d-flex">
        <!-- POST SECTION -->
        <div class="posts-section">
            <h1>Our latest blog posts</h1>
            <LoaderComp
                v-if="!posts"
            />
            <div v-else>

                <div>

                    <PostComp
                     v-for="post in posts"
                    :key="`post-${post.id}`"
                    :post='post' />

                </div>

                <div class="mt-4 pb-4" v-if="success">
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
        <!-- /POST SECTION -->
        <!-- SIDE NAV -->
        <div v-show="posts">
            <SidenavComp
            @getPostByTag="getPostByTag"
            @getPostByCategory="getPostByCategory"
            @getApi="getApi"/>

        </div>
        <!-- /SIDE NAV -->

    </div>
</template>

<script>
import PostComp from './PostComp.vue';
import LoaderComp from './LoaderComp.vue';
import SidenavComp from './SidenavComp.vue';

export default {
    name: 'BlogComp',
    components:{
        PostComp,
        LoaderComp,
        SidenavComp
    },

    data(){

        return{
            apiUrl: '/api/posts',
            posts: null,
            currentPage: null,
            lastPage: null,
            success: true
        }
    },
    methods:{

        getApi(page){
            this.posts = null;
            this.success = false
            axios.get(this.apiUrl + '?page=' + page)
            .then(res => {

                this.currentPage = res.data.posts.current_page;
                this.posts = res.data.posts.data;
                this.lastPage = res.data.posts.last_page;
                this.success = true;

            })
        },

        getPostByTag(string){
            // console.log(string);
            this.posts = null;
            this.success = false;

            axios.get(this.apiUrl + '/search-tag/' + string)
            .then(res =>{
                // console.log(res.data);
                let postArray = res.data;
                postArray.forEach(post => {
                    // console.log(post)
                    this.posts = post.posts;
                })
            })
        },

        getPostByCategory(string){
            // console.log(string);
            this.posts = null;
            this.success = false;

            axios.get(this.apiUrl + '/search-category/' + string)
            .then(res => {
                // console.log(res);
                this.posts = res.data.posts;
            })
        }

    },

    mounted(){
        this.getApi(1)
    }
}
</script>

<style lang="scss" scoped|>
.posts-section{
    flex-basis: 70%;
}
</style>
