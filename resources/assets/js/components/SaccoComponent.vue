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
                        <td>Total Deposits</td>
                        <td>Total Withdrawals</td>
                        <td>Total Net Amount</td>
                        <td>Deposits By Males</td>
                        <td>Deposits By Females</td>
                        <td>Withdrawals By Males</td>                     
                        <td>Withdrawals By Females</td>
                    </tr>
                    <tr  v-for="s in info.data.data">
                        <td>{{ s.id }}</td>
                        <td>{{ s.name }}</td>
                        <td>{{ s.country }}</td>
                        <td>{{ s.totdep | currency }}</td>
                        <td>{{ s.totwith  | currency  }}</td>
                        <td>{{ s.totnet  | currency  }}</td>
                        <td>{{ s.totdepmen  | currency  }}</td>
                        <td>{{ s.totdepwomen  | currency  }}</td>
                        <td>{{ s.totwithmen  | currency  }}</td>                        
                        <td>{{ s.totwithwomen  | currency  }}</td>   
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
            return 'UGX' + value.toFixed(0)
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