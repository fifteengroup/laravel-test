<template>
    <div>
        <div v-for="(item,index) in mutableOrderItems" class="form-group">
            <p>Item {{ index + 1 }}</p>
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-12">
                <input id="name" v-model="item.product_name" :name="`item[${index}][product_name]`" class="form-control"
                       type="text" required>
            </div>
            <label class="col-md-4 control-label" for="price">Price</label>
            <div class="col-md-12">
                <input id="price" v-model="item.price" :name="`item[${index}][price]`" class="form-control"
                       type="number" step="0.01" required>
            </div>
            <div class="col-md-4 control-label">
                <div class="btn btn-warning" v-on:click="removeItem(index)">Remove Item</div>
            </div>
        </div>
        <div class="m-form__group form-group row">
            <div class="col-lg-4">
                <div class="btn btn-secondary" v-on:click="addItem">Add New Order Item</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderItemForm",
    props: {
        orderItems: Array
    },
    data() {
        return {
            mutableOrderItems: []
        }
    },
    mounted() {
        this.mutableOrderItems = this.orderItems;
    },
    methods: {
        addItem() {
            this.mutableOrderItems.push({
                product_name: '',
                price: 0
            })
        },
        removeItem(index) {
            this.mutableOrderItems.splice(index, 1);
        }
    }
}
</script>

<style scoped>

</style>
