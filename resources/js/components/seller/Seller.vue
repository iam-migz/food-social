<template>
    <div class="d-flex flex-column">
        <div class="ml-auto">
            <router-link to="/" class="d-inline">
                Logout
                <svg style="width: 25px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </router-link>
        </div>


        <div class="d-flex flex-column w-75  mx-auto mt-5 p-4 bg-light rounded shadow" id="content">

            <div class="d-flex align-items-baseline">
                <h1>{{ seller.restaurant_name }} Restaurant</h1>
                <p class="ml-4">Managed By: {{ seller.username }} </p>
            </div>

            <div class="d-flex border-bottom p-3">
                <router-link :to="`/${id}/seller/list`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Your Foods</button>
                </router-link>
        
                <router-link :to="`/${id}/seller/add`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Add Food</button>
                </router-link>
            
                <router-link :to="`/${id}/seller/orders`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Orders</button>
                </router-link>
            </div>


            <router-view></router-view>

        </div>

      
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            seller: {}
        }
    },
    methods: {
        getSeller(){
            axios.get(`/api/seller/${this.id}`)
                .then(res => {
                    this.seller = res.data[0];
                    if (!this.seller){ // if seller is not found, just go to catch all 404 page
                        this.$router.push('404');
                    }
                })
                .catch(err => console.log(err));
        }
    },
    created(){
        this.getSeller();
    }
}
</script>

<style lang="scss" scoped>
ul {
    list-style: none;
}
</style>