<template>
    <v-container>
        <div class="qr">
            <p>
                Track function:
                <select v-model="selected">
                    <option
                        v-for="option in options"
                        :key="option.text"
                        :value="option"
                    >{{ option.text }}</option>
                </select>
            </p>

            <qrcode-stream
                class="camera"
                @decode="onDecode"
                :key="_uid"
                :track="selected.value"
                @init="logErrors"
            />
            <qrcode-drop-zone @dragover="onDragOver">
                <div :class="{ highlight: draggingOver }">
                    <!-- ... -->
                </div>
            </qrcode-drop-zone>

        </div>
    </v-container>
</template>

<script>

import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'
export default {

    components: { QrcodeStream },

    data() {

        const options = [
            { text: "nothing (default)", value: undefined },
            { text: "outline", value: this.paintOutline },
            { text: "centered text", value: this.paintCenterText },
            { text: "bounding box", value: this.paintBoundingBox },
        ]

        const selected = options[1]

        return { selected, options , draggingOver: false }
    },

    methods: {
        paintOutline(detectedCodes, ctx) {
            for (const detectedCode of detectedCodes) {
                const [firstPoint, ...otherPoints] = detectedCode.cornerPoints

                ctx.strokeStyle = "green";

                ctx.beginPath();
                ctx.moveTo(firstPoint.x, firstPoint.y);
                for (const { x, y } of otherPoints) {
                    ctx.lineTo(x, y);
                }
                ctx.lineTo(firstPoint.x, firstPoint.y);
                ctx.closePath();
                ctx.stroke();
            }
        },

        paintBoundingBox(detectedCodes, ctx) {
            for (const detectedCode of detectedCodes) {
                const { boundingBox: { x, y, width, height } } = detectedCode

                ctx.lineWidth = 2
                ctx.strokeStyle = '#007bff'
                ctx.strokeRect(x, y, width, height)
            }
        },

        paintCenterText(detectedCodes, ctx) {
            for (const detectedCode of detectedCodes) {
                const { boundingBox, rawValue } = detectedCode

                const centerX = boundingBox.x + boundingBox.width / 2
                const centerY = boundingBox.y + boundingBox.height / 2

                const fontSize = Math.max(12, 50 * boundingBox.width / ctx.canvas.width)
                console.log(boundingBox.width, ctx.canvas.width)

                ctx.font = `bold ${fontSize}px sans-serif`
                ctx.textAlign = "center"

                ctx.lineWidth = 3
                ctx.strokeStyle = '#35495e'
                ctx.strokeText(detectedCode.rawValue, centerX, centerY)

                ctx.fillStyle = '#5cb984'
                ctx.fillText(rawValue, centerX, centerY)
            }
        },

        logErrors(promise) {
            promise.catch(console.error)
        },
        onDecode(decodedString) {
            let arr= decodedString.split("/");
            let token = arr[arr.length-1];
            window.location.href = `/inventaire/materiel/${token}/search` ;
        },
        onDragOver(draggingOver) {
            this.draggingOver = draggingOver
        },
    }

}
</script>
<style scoped>
.qr {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.camera {
    width: 50%;
    height: 100%;
}
</style>
