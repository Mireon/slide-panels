import '@styles/slide-panels';
import Levers from './Levers/Levers';
import Stage from './Stage/Stage';

Levers.setOnClickLeverListener((e, lever) => Stage.execute(lever));
