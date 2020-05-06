import '@styles/slide-panels';
import Levers from '@modules/Levers/Levers';
import Stage from '@modules/Stage/Stage';

const stage = new Stage();
const levers = new Levers();
levers.setToShowClickListener((lever) => stage.show(lever.getTarget()));
levers.setToHideClickListener(() => stage.hide());

// TODO: Deleted after end.
import Target from '@entities/Target';
stage.show(new Target('mazda'));
