import Side from '@modules/Sides/Side';
import { C } from '@entities/C';
import Target from '@entities/Target';

/**
 * ...
 */
class Sides {
    /**
     * ...
     *
     * @type Side
     */
    private left: Side;

    /**
     * ...
     *
     * @type Side
     */
    private right: Side;

    /**
     * The constructor.
     */
    public constructor() {
        this.left = new Side(C.side.LEFT);
        this.right = new Side(C.side.RIGHT);
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target) {
        switch (target.getSide()) {
            case C.side.LEFT:
                this.left.inside();
                this.right.outside();
                break;
            case C.side.RIGHT:
                this.right.inside();
                this.left.outside();
                break;
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.left.outside();
        this.right.outside();
    }
}

export default Sides;
