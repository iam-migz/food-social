<template>
    <div>

        <div class="container">
            
            <Header></Header>

            <router-view></router-view>

        </div>

    </div>
</template>

<script>

import Header from './partials/Header';

export default {
    components: { Header },
    data() {
        return {

        }
    },
    methods: {

    }   
}
</script>

<style lang="scss" scoped>


</style>