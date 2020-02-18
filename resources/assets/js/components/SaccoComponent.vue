<template>
    <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <br>
                    <hr>
                    <br>
                    <div class="panel-heading">SACCOs</div>
                    <br>
                    <div class="panel-body">
                        <table class="table table-bordered" width="100%">
                            <tr>
                                <td>#</td>
                                <td>SACCOs</td>
                                <td>Country</td>
                                <td>Total Deposits</td>
                                <td>Total Withdrawals</td>
                                <td>Total Net Amount</td>
                                <td>Total Deposits By Male</td>
                                <td>Total Withdrawals By Male</td>
                                <td>Total Deposits By Female</td>
                                <td>Total Withdrawals By Female</td>
                            </tr>
                            <tr v-for="s in saccos" v-bind:key="s.id">
                                <td>{{ s.id }}</td>
                                <td>{{ s.name }}</td>
                                <td>{{ s.country }}</td>
                                <td>{{ s.totdep }}</td>
                                <td>{{ s.totwith }}</td>
                                <td>{{ s.totnet }}</td>
                                <td>{{ s.totdepmen }}</td>
                                <td>{{ s.totwithmen }}</td>
                                <td>{{ s.totdepwomen }}</td>
                                <td>{{ s.totwithwomen }}</td>   
                            </tr>
                        </table>
                    </div>
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
            saccos: null,
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
            .get('/api/saccos')
            .then(response => {
                this.saccos = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>