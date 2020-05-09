import SideAnimation from '@modules/Sides/SideAnimation';
import State from '@tools/State';
import { C } from '@entities/C';

/**
 * ...
 */
class Side {
    /**
     * ...
     */
    private animation: SideAnimation;

    /**
     * ...
     *
     * @type State
     */
    private state: State;

    /**
     * The constructor.
     *
     * @param side { C.side }
     *   ...
     */
    public constructor(side: C.side) {
        this.animation = new SideAnimation(side);
        this.state = new State();
    }

    /**
     * ...
     *
     *
     * @return void
     */
    public inside() {
        if (this.state.isHidden()) {
            this.animation.inside();
            this.state.show();
            this.state.show();
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public outside() {
        if (this.state.isVisible()) {
            this.animation.outside();
            this.state.hide();
        }
    }
}

export default Side;
