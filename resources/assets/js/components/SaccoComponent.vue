<template>
    <div class="section">

         <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

            <div v-else>
                <table class="table table-striped" width="100%">
                    <tr>
                        <td>#</td>
                        <td>SACCOs</td>
                        <td>Country</td>
                        <td>Statistics</td>
                    </tr>
                    <tr  v-for="s in info.data.data">
                        <td>{{ s.id }}</td>
                        <td>{{ s.name }}</td>
                        <td>{{ s.country }}</td>
                        <td>
                             <table class="table table-striped" cellspacing="2" cellpadding="2">
                                 <tr>
                                    <td>Total Deposits</td>
                                     <td>{{ s.totdep | currency }}</td>
                                </tr>
                                <tr>
                                    <td>Total Withdrawals</td>
                                    <td >{{ s.totwith  | currency  }}</td>
                                </tr>
                                <tr>
                                    <td>Total Net Amount</td>
                                    <td>{{ s.totnet  | currency  }}</td>
                                </tr>
                                <tr>
                                    <td>Total Deposits By Males</td>
                                    <td>{{ s.totdepmen  | currency  }}</td>
                                </tr>
                                <tr>
                                    <td>Total Deposits By Females</td>
                                    <td>{{ s.totdepwomen  | currency  }}</td>
                                </tr>
                                <tr>
                                    <td>Total Withdrawals By Males</td>
                                    <td>{{ s.totwithmen  | currency  }}</td>
                                </tr>
                                <tr>
                                    <td>Total Withdrawals By Females</td>
                                    <td>{{ s.totwithwomen  | currency  }}</td>
                                </tr>
                            </table>
                        </td>
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
            info: null,
            loading: true,
            errored: false
            }
        },

        filters: {
            currency (value) {
            return 'UGX ' + Number(value.toFixed(0)).toLocaleString()
            }  
        },

        mounted() {
            axios
            .get('/api/saccos')
            .then(response => {
                this.info = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>