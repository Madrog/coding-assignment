<template>
    <div class="section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <br>
                    <hr>
                    <br>
                    <div class="panel-heading">Summary</div>
                    <br>
                    <div class="panel-body">

                    <table>
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
                </div>
            </div>
        </div>
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