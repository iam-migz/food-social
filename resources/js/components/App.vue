<template>
    <div>

        <div class="container">
            
            <Header></Header>

            <router-view></router-view>

            <Footer></Footer>
             
        </div>
       
    </div>
</template>

<script>

import Header from './partials/Header';
import Footer from './partials/Footer';

export default {
    components: { Header, Footer },
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