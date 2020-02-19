<template>
     <div class="section">
        <div class="container">
            <form enctype="multipart/form-data">
                <div class="field">
                    <label for="file" class="label">Upload File</label>
                    <br/>
                    <input
                        type="file"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "SimpleUpload"
}
</script>