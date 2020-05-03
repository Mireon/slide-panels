import Side from '@modules/Sides/Side';
import { C } from '@entities/C';

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
     * @param side { C.side }
     *   ...
     *
     * @return void
     */
    public inside(side: C.side) {
        switch (side) {
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
    public outside() {
        this.left.outside();
        this.right.outside();
    }
}

export default Sides;
