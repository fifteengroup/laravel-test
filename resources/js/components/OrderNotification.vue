<template>
    <div v-if="Object.keys(orderData).length" class="modal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Order Created</h5>
                    <button aria-label="Close" class="close" v-on:click="dismiss" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Order Number</td>
                                <td>Order Value</td>
                                <td># of items</td>
                                <td>Company</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{orderData.id}}</td>
                                <td>{{orderData.total_cost}}</td>
                                <td>{{orderData.item_count}}</td>
                                <td>{{orderData.company_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" v-on:click="dismiss">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderNotification",
    data() {
        return {
            orderData: {}
        }
    },
    mounted() {
        this.initEcho()
    },
    methods: {
        dismiss() {
            this.orderData = {};
        },
        initEcho() {
            const self = this;
            window.Echo.channel('AllUsers').listen('.OrderCreated', (e) => {
                self.orderData = e.order;
            });
        }
    }
}
</script>

<style scoped>
    .modal {
        display: block;
    }
</style>
