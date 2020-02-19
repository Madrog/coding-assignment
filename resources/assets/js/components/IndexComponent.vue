<template>
     <div class="section">
         <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

            <div v-else>
                <div class="m-b-md">Index</div>
                <table class="table table-striped" width="100%">
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>SACCOs</td>
                        <td>Amount</td>
                        <td>Type</td>
                    </tr>
                    <tr v-for="t in top50.data">
                        <td>{{ t.id }}</td>
                        <td>{{ t.name }}</td>
                        <td>{{ t.sacco }}</td>
                        <td>{{ t.amount }}</td>
                        <td>{{ t.type }}</td>  
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
            top50: null,
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
            .get('/api/index')
            .then(response => {
                this.top50 = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>