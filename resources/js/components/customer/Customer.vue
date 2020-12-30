<template>
    <div class="d-flex flex-column">
        <div class="ml-auto">
            <div class="d-inline"> {{ customer.username }}  </div>
            

            <router-link to="/" class="d-inline ml-3">
                Logout
                <svg style="width: 25px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </router-link>
        </div>


        <div class="d-flex flex-column w-75  mx-auto mt-5 p-4 bg-light rounded shadow" id="content">

            <div class="d-flex align-items-baseline justify-content-between">
                <h1>Search foods</h1>
                <div class="w-50 d-flex">
                    <input type="email" class="form-control w-75 mr-3" id="search" placeholder="search here ex. adobo">
                    <svg class="w-6 h-6" style="width: 25px; color: grey;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>     
                </div>
            </div>

            <div class="d-flex border-bottom p-3">
                <router-link :to="`/${id}/customer/foods`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Foods</button>
                </router-link>
        
                <router-link :to="`/${id}/customer/restaurants`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Restaurants</button>
                </router-link>
            
                <router-link :to="`/${id}/customer/yourorders`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Your Orders</button>
                </router-link>
            </div>


            <router-view :food-list="foods" :restaurant-list="restaurants"></router-view>

        </div>

      
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            customer: {},
            foods: [],
            restaurants: []
        }
    },
    methods: {
        getCustomer(){
            axios.get(`/api/customer/${this.id}`)
                .then(res => {
                    this.customer = res.data[0];
                    if (!this.customer){ // if customer is not found, just go to catch all 404 page
                        this.$router.push('404');
                    }
                })
                .catch(err => console.log(err));
        },
        getFoods(){
            axios.get('/api/food/index')
                 .then(res => { // res.data is an object
                     let foods = res.data;
                     foods.forEach(food => {
                         axios.get(`/api/seller/${food.seller_id}`)
                             .then(sellerArray => {
                                 let seller = sellerArray.data[0];
                                 this.foods.push({
                                     ...food,
                                     'restaurant_name': seller.restaurant_name,
                                     'restaurant_owner': seller.username,
                                     'restaurant_address': seller.address
                                 });
                             })
                             .catch(err => console.log(err));
                     })
                 })
                 .catch(err => console.log(err));
        },
        getSeller(){
            axios.get('/api/seller/index')
                 .then(res => this.restaurants = res.data)
                 .catch(err => console.log(err));
        }
    },
    created(){
        this.getCustomer();
        this.getFoods();
        this.getSeller();
    }
}
</script>

<style lang="scss" scoped>
ul {
    list-style: none;
}

</style>