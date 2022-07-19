<template>
    <div>
        <h4>Categories:</h4>
        <ul>
            <li v-for="category in categories" :key="`cat${category.id}`" >{{ category.category }}</li>
        </ul>

        <h4>Tags:</h4>
        <ul>
            <li v-for="tag in tags" :key="`cat${tag.id}`" >{{ tag.name }}</li>
        </ul>

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
            categories: []
        }
    },

    methods:{
        getTagsCategories(){
            axios.get(this.apiUrl + '/tags-categories')
            .then(res => {
                console.log(res.data);
                this.tags = res.data.tags;
                this.categories = res.data.categories;
                console.log(this.categories);
                console.log(this.tags);
            })
        }
    },

    mounted(){
        this.getTagsCategories()
    }
}
</script>

<style lang="scss" scoped>

</style>
