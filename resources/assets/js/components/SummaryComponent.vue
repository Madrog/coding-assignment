<template>
    <div class="section">
         <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

            <div v-else>
                <div class="m-b-md">Summary</div>
                    <table class="table table-striped" width="100%">
                        <tr>
                            <td>Total Number of Transactions</td>
                            <td>{{summary.data.data.tot_num_of_trans}}</td>
                        </tr>
                        <tr>
                            <td>Total Amount of Deposits</td>
                            <td>{{summary.data.data.tot_amt_of_dep}}</td>
                        </tr>
                        <tr>
                            <td>Total Amount of Withdrawals</td>
                            <td>{{summary.data.data.tot_amt_of_with}}</td>
                        </tr>
                        <tr>
                            <td>Average Amount per Deposit</td>
                            <td>{{summary.data.data.avg_amt_per_dep}}</td>
                        </tr>
                        <tr>
                            <td>Average Amount per Withdrawal</td>
                            <td>{{summary.data.data.avg_amt_per_with}}</td>
                        </tr>
                    </table>
            </div>               
        </section>
    </div>
</template>

<script>
    export default {
        data () {
            return {
            summary: null,
            loading: true,
            errored: false
            }
        },

        filters: {
            currencydecimal (value) {
            return value.toFixed(0)
            }  
        },

        mounted() {
            axios
            .get('/api/summary')
            .then(response => {
                this.summary = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>