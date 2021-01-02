<template>
    <div class="mt-3">
        <h2>Available Foods</h2>
        <div class="d-flex flex-wrap">
            
            <div class="w-50" 
                v-for="(food, index) in foodsInfo"
                :key="index"
            >
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ food.name }}</h5>
                    <p class="card-subtitle text-muted">{{ food.restaurant_name }}'s Restaurant</p>
                    <p class="card-text mt-2">₱ {{ food.price }}</p>
                    <p class="card-text">Available: {{ food.quantity }}</p>
                    <router-link :to="`/${id}/customer/view/${index}`">
                        <button type="button" class="btn btn-primary">view</button>
                    </router-link>
                </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['foodsInfo'],
        data() {
            return {
                id: this.$route.params.id,
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>