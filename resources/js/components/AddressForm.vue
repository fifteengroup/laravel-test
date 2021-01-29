<template>
    <div>
        <div v-for="(address, index) in mutableAddresses" :key="index" class="form-group">
            <p>Address {{ index + 1 }}</p>
            <label class="col-md-4 control-label" for="line1">Address Line 1</label>
            <div class="col-md-12">
                <input id="line1" v-model="address.line1" :name="`address[${index}][line1]`" class="form-control"
                       type="text">
            </div>
            <label class="col-md-4 control-label" for="line2">Address Line 2</label>
            <div class="col-md-12">
                <input id="line2" v-model="address.line2" :name="`address[${index}][line2]`" class="form-control"
                       type="text">
            </div>
            <label class="col-md-4 control-label" for="line3">Address Line 3</label>
            <div class="col-md-12">
                <input id="line3" v-model="address.line3" :name="`address[${index}][line3]`" class="form-control"
                       type="text">
            </div>
            <label class="col-md-4 control-label" for="line3">Town</label>
            <div class="col-md-12">
                <input id="town" v-model="address.town" :name="`address[${index}][town]`" class="form-control"
                       type="text">
            </div>
            <label class="col-md-4 control-label" for="line3">Postcode</label>
            <div class="col-md-12">
                <input id="postcode" v-model="address.postcode" :name="`address[${index}][postcode]`"
                       class="form-control"
                       type="text">
            </div>
            <div class="col-md-4 control-label">
                <div class="btn btn-warning" v-on:click="removeAddress(index)">Remove Address</div>
            </div>
        </div>
        <div class="m-form__group form-group row">
            <div class="col-lg-4">
                <div class="btn btn-secondary" v-on:click="addNewAddress">Add New Address</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddressForm",
    props: {
        addresses: Array
    },
    data() {
        return {
            mutableAddresses: []
        }
    },
    mounted() {
        this.mutableAddresses = this.addresses;
    },
    methods: {
        addNewAddress() {
            this.mutableAddresses.push({
                line1: '',
                line2: '',
                line3: '',
                town: '',
                postcode: '',
            })
        },
        removeAddress(index) {
            this.mutableAddresses.splice(index, 1);
        }
    }
}
</script>

<style scoped>

</style>
