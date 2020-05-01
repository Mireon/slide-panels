import '@styles/slide-panels';
import Levers from './Levers/Levers';
import Stage from './Stage/Stage';

const stage = new Stage();
const levers = new Levers();
levers.setToShowClickListener((lever) => stage.show(lever.getTarget()));
levers.setToHideClickListener(() => stage.hide());
