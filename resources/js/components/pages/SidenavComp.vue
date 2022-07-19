<template>
    <div>
        <h4>Categories:</h4>
        <ul>
            <li v-for="category in categories" :key="`cat${category.id}`" >
                <a href="#"
                @click="findPostByCat(category.slug)">{{ category.category }}</a>
                 <!-- @click="$emit('getPostByCategory', category.slug) -->
            </li>
        </ul>

        <h4>Tags:</h4>
        <ul>
            <li v-for="tag in tags" :key="`cat${tag.id}`">
                <a href="#"
                @click="findPostByTag(tag.slug)">{{ tag.name }}</a>
                <!-- @click="$emit('getPostByTag', tag.slug)" -->
            </li>
        </ul>

        <button class="btn btn-primary" v-if="showBtn"
        @click="backToAllPosts()">Back to posts</button>

    </div>
</template>

<script>
import { apiUrl } from '../../data/config';

export default {
    name: 'SidenavComp',

    data(){
        return{
            apiUrl,
            tags: [],
            categories: [],
            showBtn: false
        }
    },

    methods:{
        getTagsCategories(){
            axios.get(this.apiUrl + '/tags-categories')
            .then(res => {
                this.tags = res.data.tags;
                this.categories = res.data.categories;
            })
        },

        findPostByTag(slug){
            this.$emit('getPostByTag', slug);
            this.showBtn = true;
        },

        findPostByCat(slug){
            this.$emit('getPostByCategory', slug);
            this.showBtn = true;
        },

        backToAllPosts(){
            this.$emit('getApi');
            this.showBtn = false;
        }
    },

    mounted(){
        this.getTagsCategories()
    }
}
</script>

<style lang="scss" scoped>
ul{
    list-style: none;
    padding-left: 0;
    li a{
        text-decoration: none;
        color: white;
        &:hover{
            text-decoration: underline;
        }
    }
}
</style>
