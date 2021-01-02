<template>
    <div>
        <h5 class="text-muted my-4">add food to your restaurant</h5>
        <form id="addFood" method="POST" :action="`/api/food/store/${id}`" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Food Name</label>
                <input type="text" class="form-control" name="name" placeholder="food name ex. adobo" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control"  name="price" placeholder="₱" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="# Available Servings or Stock" required>
            </div>

              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" >Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
        }
    },
    methods: {
        saveFood(event){
            event.preventDefault();
            const form = document.querySelector('form#addFood');
            
            if ( form.name.value === '' || form.price.value === '' || form.quantity.value === '' ) {
                console.log('empty');
                return;
            }

            const food = {
                'seller_id': this.id,
                'name': form.name.value,
                'price': form.price.value,
                'quantity': form.quantity.value 
            }
            console.log(food);
            axios.post('/api/food/store', food)
                 .then(res => {
                     if ( res.data ){
                         this.$router.push(`/${this.id}/seller/list`);
                     } else {
                         console.log('could not save to database');
                     }
                 })
                 .catch(err => console.log(err));

        }
    }
}
</script>

<style lang="scss" scoped>

</style>