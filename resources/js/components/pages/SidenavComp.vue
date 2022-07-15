<template>
    <div>
        <h4>Categories:</h4>
            <ul>
                <li></li>
            </ul>
        <h4>Tags:</h4>
    </div>
</template>

<script>
import { apiUrl } from '../../data/config';

export default {
    name: 'SidenavComp',

    data(){
        return{
            apiUrl
        }
    },

    methods:{
        getTagsCategories(){
            axios.get(this.apiUrl + '/tags-categories')
            .then(res => {
                console.log(res)
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
