import SideAnimation from '@modules/Sides/SideAnimation';
import State from '@tools/State';
import { Props } from '@tools/Props';

/**
 * The side.
 */
export default class Side {
    /**
     * The side animation.
     */
    private readonly animation: SideAnimation;

    /**
     * The side state.
     *
     * @type State
     */
    private readonly state: State;

    /**
     * The constructor.
     *
     * @param side { Props.side }
     *   A side.
     */
    public constructor(side: Props.side) {
        this.animation = new SideAnimation(side);
        this.state = new State();
    }

    /**
     * Inserts the side to inside.
     *
     * @return void
     */
    public inside(): void {
        if (this.state.isHidden()) {
            this.animation.inside();
            this.state.show();
            this.state.show();
        }
    }

    /**
     * Retrieves the side to outside.
     *
     * @return void
     */
    public outside(): void {
        if (this.state.isVisible()) {
            this.animation.outside();
            this.state.hide();
        }
    }
}
