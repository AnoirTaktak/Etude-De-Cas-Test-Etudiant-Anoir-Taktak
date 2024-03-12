import Accueil from "./components/Accueil.vue";
import ViewSalles from "./components/salles/ViewSalles.vue";
import AddSpectacle from "./components/spectacles/AddSpectacle.vue";
export const routes = [
    {
        name: "accueil",
        path: "/",
        component: Accueil,
    },
    {
        name:"ViewSalles",
        path:"/listsalles",
        component:ViewSalles,
    },
    {
        name:"addSpectacle",
        path:"/addspec",
        component:AddSpectacle,
    }

];
