<template>
    <v-container>
        <v-row class="justify-center ma-10 text-center">
            <v-col @click="setEmprunt('moi')" cols="4">
                <v-btn class="white--text" color="green">Moi</v-btn>
            </v-col>
            <v-col @click="setEmprunt('team')" cols="4">
                <v-btn class="white--text" color="green">Une team</v-btn>
            </v-col>
            <v-col @click="setEmprunt('autre')" cols="4">
                <v-btn class="white--text" color="green">Autre Personne</v-btn>
            </v-col>
        </v-row>
        <v-container class="mx-auto text-center">
            <v-form v-if="typeEmpruntSelect == 'moi'" :action="'/inventaire/contrat/self/store'">
                <input type="hidden" name="_token" :value="csrf" />
                <v-select
                    name="materiel_id"
                    v-model="materiel"
                    :items="materiels"
                    item-value="id"
                    item-text="nom"
                ></v-select>
                <v-btn color="primary" type="submit">Confirmer</v-btn>
            </v-form>
            <v-form
                :action="
                    '/inventaire/contrat/' + (materiel ? materiel.id : '0') + '/team'
                "
                v-else-if="typeEmpruntSelect == 'team'"
                method="post"
            >
                <input type="hidden" name="_token" :value="csrf" />

                <qrcode-stream
                     :track="selected.value"
                    @init="logErrors"
                    class="camera"
                    @decode="onDecode"
                    :key="_uid"
                    :camera="camera"
                >
                <div v-if="validationSuccess" class="validation-success">Le Matériel est disponible</div>

            <div v-if="validationFailure" class="validation-failure">Le Matériel est déjà réservée  ! </div>

            <div v-if="validationPending" class="validation-pending">Scan en cours...</div>
                </qrcode-stream>
                <v-select
                    v-if="materiel"
                    :items="users"
                    item-text="firstname"
                    name="team_id"
                    v-model="team_member_id"
                    item-value="id"
                    label="Team"
                    single-line
                >
                    <template
                        slot="selection"
                        slot-scope="data"
                    >{{ data.item.firstname }} {{ data.item.lastname }}</template>
                    <template
                        slot="item"
                        slot-scope="data"
                    >{{ data.item.firstname }} {{ data.item.lastname }}</template>
                </v-select>

                <v-btn type="submit" v-if="checkSelectedTeamMember" color="primary">Confirm</v-btn>
            </v-form>
            <v-form
                v-else-if="typeEmpruntSelect == 'autre'"
                enctype="multipart/form-data"
                :action="
                    '/inventaire/contrat/' +
                    (materiel ? materiel.id : '0') +
                    '/emprunteur'
                "
                method="POST"
            >
                <qrcode-stream
                    :track="selected.value"
                    @init="logErrors"
                    class="camera"
                    @decode="onDecode"
                    :key="_uid"
                    :camera="camera"
                >
                   <div v-if="validationSuccess" class="validation-success">Le Matériel est disponible</div>

            <div v-if="validationFailure" class="validation-failure">Le Matériel est déjà réservée  ! </div>

            <div v-if="validationPending" class="validation-pending">Scan en cours...</div>
                </qrcode-stream>
                <input type="hidden" name="_token" :value="csrf" />
                <v-file-input v-if="materiel" name="cart_id" v-model="photo_id"></v-file-input>
                <v-row v-show="photo_id" v-if="materiel">
                    <v-col cols="4">
                        <v-text-field name="nom" label="nom"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-text-field name="prenom" label="prenom"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-text-field name="formation" label="formation"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-text-field name="adresse" label="adresse"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-text-field name="duree" type="number" min="1" label="durée (jours)"></v-text-field>
                    </v-col>
                    <v-col cols="12">
                        <p>Date de naissance</p>
                        <v-date-picker
                            name="date_naissance"
                            label="date_naissance"
                            v-model="date_naissance"
                        ></v-date-picker>
                        <input type="hidden" name="date_naissance" :value="date_naissance" />
                    </v-col>
                </v-row>
                <v-btn v-if="materiel" type="submit" color="primary">Register</v-btn>
            </v-form>
        </v-container>
    </v-container>
</template>
<script>
import { QrcodeStream } from "vue-qrcode-reader";

export default {
    name: "Create",
    props: {
        materiels: [Array],
        users: [Array],

    },
    components: { QrcodeStream },
    data() {
        const options = [
            { text: "nothing (default)", value: undefined },
            { text: "outline", value: this.paintOutline },
            { text: "centered text", value: this.paintCenterText },
            { text: "bounding box", value: this.paintBoundingBox },
        ];
        const selected = options[1];
        return {
            camera:'auto',
            isValid:undefined,
            typeEmpruntSelect: "moi",
            team_member_id: 0,
            photo_id: null,
            draggingOver: false,
            date_naissance: '',
            materiel: null,
            selected,
            options,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
    methods: {
        setEmprunt(value) {
            this.typeEmpruntSelect = value;
            this.materiel = null;
            this.camera = 'auto';
            this.isValid= undefined;
        },
        checkIsValidToken(token) {
            return this.materiels.find((elem) => {
                console.log(elem.token, token);
                return elem.token == token;
            });
        },
        onDragOver(draggingOver) {
            this.draggingOver = draggingOver;
        },
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

        async onDecode(decodedString) {
           let arr = decodedString.split("/");
            let tokenToCheck = arr[arr.length - 1];

            if (this.checkIsValidToken(tokenToCheck)) {
                this.materiel = this.checkIsValidToken(tokenToCheck);
                  this.isValid = true;
                // this.result = token;
            } else {
                this.isValid = false;


                // this.result = token;
            }
            this.turnCameraOff()

            // pretend it's taking really long
            await this.timeout(3000)
            this.isValid =this.checkIsValidToken(tokenToCheck) != undefined

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
    },
    computed: {
        checkSelectedTeamMember() {
            return (
                this.users.filter((elem) => elem.id == this.team_member_id).length > 0
            );
        },
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
};
</script>
<style scoped>
.camera {
    width: 50%;
    height: 100%;
    margin: 0 auto;
}
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
