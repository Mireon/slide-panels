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
    public show(side: C.side) {
        switch (side) {
            case C.side.LEFT:
                this.left.show();
                this.right.hide();
                break;
            case C.side.RIGHT:
                this.right.show();
                this.left.hide();
                break;
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.left.hide();
        this.right.hide();
    }
}

export default Sides;
