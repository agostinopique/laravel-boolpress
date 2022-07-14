<template>
    <div>
        <div class="mt-3 ">
            <h3>{{ post.title }}</h3>
            <p>{{ post.content }}</p>
    </div>
    </div>
</template>

<script>
export default {
    name: 'PostComp',
    props:{
        post:Object
    }
}
</script>

<style lang="scss" scoped>
h3{
    text-transform: capitalize;
}
p{
    margin-bottom: 0;
}
</style>
