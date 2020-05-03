import { C } from '@entities/C';

/**
 * ...
 */
class Visibility {
    /**
     * ...
     *
     * @type string
     */
    private state: C.visibility;

    /**
     * ...
     *
     * @param state { string }
     *   ...
     */
    public constructor(state: C.visibility = C.visibility.HIDDEN) {
        this.state = state;
    }

    /**
     * ...
     *
     * @return void
     */
    public setVisible(): void {
        this.state = C.visibility.VISIBLE;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isVisible(): boolean {
        return this.state === C.visibility.VISIBLE;
    }

    /**
     * ...
     *
     * @return void
     */
    public setHidden(): void {
        this.state = C.visibility.HIDDEN;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isHidden(): boolean {
        return this.state === C.visibility.HIDDEN;
    }
}

export default Visibility;
