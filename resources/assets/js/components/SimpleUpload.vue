<template>
    <form enctype="multipart/form-data">
        <div class="field">
            <label for="file" class="label">Upload File</label>
            <br/>
            <input
                type="file"
            />
        </div>
    </form>
</template>

<script>
export default {
    name: "SimpleUpload"
}
</script>