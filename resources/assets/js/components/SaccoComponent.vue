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
                        data goes here
                        {{ saccos }}
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
                this.saccos = response.data
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>