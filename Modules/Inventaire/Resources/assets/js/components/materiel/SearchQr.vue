<template>
    <div>
        <p class="decode-result">
            Last result:
            <b>{{ result }}</b>
        </p>

        <qrcode-stream   :key="_uid" :camera="camera" @decode="onDecode" @init="onInit"  :track="selected.value">
            <div v-if="validationSuccess" class="validation-success">C'est le bon Matériel</div>

            <div v-if="validationFailure" class="validation-failure">C'est pas le bon Matériel! Relancer le scan</div>

            <div v-if="validationPending" class="validation-pending">Scan en cours...</div>
        </qrcode-stream>
    </div>
</template>

<script>
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'

export default {
    props: {
        materiel: {
            type: String | Number,
            required: true
        }
    },

    components: { QrcodeStream },

    data() {
          const options = [
            { text: "nothing (default)", value: undefined },
            { text: "outline", value: this.paintOutline },
            { text: "centered text", value: this.paintCenterText },
            { text: "bounding box", value: this.paintBoundingBox },
        ]

        const selected = options[1]
        return {
            isValid: undefined,
            camera: 'auto',
            result: null,
            selected,
            options ,
        }
    },

    mounted() {
        this.materiel;
    },
    computed: {
        validationPending() {
            return this.isValid === undefined
                && this.camera === 'off'
        },

        validationSuccess() {

            return this.isValid === true
        },

        validationFailure() {
            return this.isValid === false
        }
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

        onInit(promise) {
            promise
                .catch(console.error)
                .then(this.resetValidationState)
        },

        resetValidationState() {
            this.isValid = undefined
        },

        async onDecode(content) {
            let arr = content.split("/");
            let token = arr[arr.length - 1];
            if (token == this.materiel) {
                this.isValid = true;
                this.result = token;
            } else {
                this.isValid = false;
                console.log(this.isValid);

                this.result = token;
            }
            this.turnCameraOff()

            // pretend it's taking really long
            await this.timeout(3000)
            this.isValid = token == this.materiel

            // some more delay, so users have time to read the message
            await this.timeout(2000)

            this.turnCameraOn()
        },

        turnCameraOn() {
            this.camera = 'auto'
        },

        turnCameraOff() {
            this.camera = 'off'
        },

        timeout(ms) {
            return new Promise(resolve => {
                window.setTimeout(resolve, ms)
            })
        }
    }
}
</script>

<style scoped>
.validation-success,
.validation-failure,
.validation-pending {
    position: absolute;
    width: 100%;
    height: 100%;

    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    font-weight: bold;
    font-size: 1.4rem;
    padding: 10px;

    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
}
.validation-success {
    color: green;
}
.validation-failure {
    color: red;
}
</style>
