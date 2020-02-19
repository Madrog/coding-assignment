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
                        <td>Total Deposits By Male</td>
                        <td>Total Withdrawals By Male</td>
                        <td>Total Deposits By Female</td>
                        <td>Total Withdrawals By Female</td>
                    </tr>
                    <tr  v-for="s in info.data.data">
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
            currencydecimal (value) {
            return value.toFixed(0)
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