<template>
    <div class="mt-3">
        <h2>Our Partner Restaurants</h2>

        <div class="d-flex flex-wrap mt-3 mx-auto">

            <div class="w-50" 
                v-for="(restaurant, index) in restaurants"
                :key="index"
            >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Restaurant: {{ restaurant.restaurant_name }}</h5>
                        <p class="card-text">Located at {{ restaurant.address }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
</template>

<script>
export default {
    data(){
        return {
            restaurants: [],
        }
    },
    methods: {
        getSeller(){
            axios.get('/api/seller/index')
                 .then(res => this.restaurants = res.data)
                 .catch(err => console.log(err));
        }
    },
    created(){
        this.getSeller();
    }
}
</script>

<style lang="scss" scoped>

</style>