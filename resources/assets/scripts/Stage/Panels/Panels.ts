/**
 * ...
 */
import PanelsVision from './PanelsVision';

/**
 * ...
 */
class Panels {

    /**
     * ...
     */
    private vision: PanelsVision;

    /**
     * The constructor.
     */
    constructor() {
        this.vision = new PanelsVision();
    }

    /**
     * ...
     *
     * @param target { Array<string> }
     *   ...
     *
     * @return void
     */
    public show(target: Array<string>) {
        this.vision.show();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.vision.hide();
    }
}

export default Panels;
